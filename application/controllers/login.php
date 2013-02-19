<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	private $rb_email_regex = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}$/';

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login_index');
	}

	public function send_login()
	{
		if($this->input->post('login') && $this->input->post('password'))
		{


		}


	}

	public function inscription_finish()
	{
		if ($_FILES['photo'] && is_uploaded_file($_FILES['photo']['tmp_name']) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK &&
				$this->input->post('email') && $this->input->post('password')) {
			var_export($this->input->post());
			$this->load->model('Mlogin');
			$u = array();
			if(preg_match($this->rb_email_regex, $this->input->post('email'))){
				$u['email'] = htmlentities($this->input->post('email'));
			} else {
				die("email incorrect");
			}
			$name = $_FILES["photo"]["name"];
			$uploads_dir = '/home/romain/www/rbeuque74.fr/others/polytech/spips/killer/img';
			if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "$uploads_dir/$name")){
				die('unable to move file');
			}
			$u['password'] = sha1($this->input->post('password')."Bi@tChPlZZZ");
			$u['prenom'] = htmlentities($this->input->post('prenom'));
			$u['nom'] = htmlentities($this->input->post('nom'));
			$u['mot_de_passe'] = htmlentities($this->input->post('mot_de_passe'));
			$u['photo'] = "$uploads_dir/$name";
			var_export($_FILES);
			var_export($u);
			$this->Mlogin->inscription_membre($u);
		}
	}

	public function login_finish()
	{
		if($this->input->post('login') && $this->input->post('password'))
		{
			$this->load->model("Mlogin");
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$password = $password . "rbeuqueisthebest!";
			$password = sha1($password);
				if($this->Mlobby->newPlayerRegistered($login, $password, $this->session->userdata('session_id')))
				{
					$res = $this->Mlobby->getUserInfo($this->session->userdata('session_id'));
					if($res){
						$cookie = array(
							'name'   => 'ci_rb_membre',
							'value'  => $res["cookie"],
							'expire' => '0'
						);
						$this->input->set_cookie($cookie);
						$this->session->set_userdata('user', $res["cookie"]);
					}
					$this->index();
				}
				else
				{
					$data["erreur"] = "La procÃ©dure d'identification a Ã©chouÃ©e!";
					$this->load->view("lobby/lobby_erreur.php", $data);
				}
			/*else
			{
				if($this->Mlobby->checkAvailability($login))
				{
					$this->Mlobby->newPlayerAnonymous($login, $perso, $this->session->userdata('session_id'));
					redirect('/lobby', 'location', 302);
				}
				else
				{
					$data["erreur"] = "Le pseudo choisi n'est plus disponible!";
					$this->load->view("lobby/lobby_erreur", $data); return;
				}
			}*/
		}
		else
		{
			$data["erreur"] = "L'accÃ¨s Ã  cette page n'est pas autorisÃ© sans passer de paramÃ¨tres!";
			$this->load->view("lobby/lobby_erreur", $data); return;
		}
	}
	public function inscription()
	{
		$this->load->view('login_inscription');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */