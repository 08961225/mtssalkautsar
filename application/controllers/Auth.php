<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('no_induk')) {
            redirect('user');
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //Validasi Sukses
            $this->_login();
        }
    }



    private function _login()
    {
        $no_induk = $this->input->post('no_induk');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['no_induk' => $no_induk])->row_array();

        // jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'no_induk' => $user['no_induk'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
//                    	echo "admin";
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
            Wrong password!
            </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
            This No Induk has not been activated!
            </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
                No Induk is not Registered! Please login with valid account
                </div>');
            redirect('auth');
        }
    }


    public function registration()
    {

        if ($this->session->userdata('no_induk')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_induk', 'no_induk', 'required|trim|valid_no_induk|is_unique[user.no_induk]', [
            'is_unique' => 'This no_induk has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'no_induk' => htmlspecialchars($this->input->post('no_induk', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'type' => 'Direct',
                'is_active' => 1,
                'date_created' => time()

            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Congratulation! your account has been created. Please Login!
            </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('no_induk');
        $this->session->unset_userdata('rolde_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
        Logout Succes
        </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
