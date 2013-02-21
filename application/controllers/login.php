<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	private $rb_email_regex = '/^[A-Za-z0-9._-]+@u-psud\.fr$/';

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

	public function staff()
	{
		$this->load->view('welcome_staff');
	}

	public function rules()
	{
		$this->load->view('welcome_rules');
	}

	public function send_login()
	{
		if($this->input->post('login') && $this->input->post('password') && preg_match($this->rb_email_regex, $this->input->post('login')))
		{
			try {
			$u = array();
			$u['email'] = htmlentities($this->input->post('login'));
			$u['password'] = sha1($this->input->post('password')."Bi@tChPlZZZ");
			$this->load->model('Mlogin');
			$result = $this->Mlogin->login_membre($u);
			if($result == NULL || count($result < 1)){
				$app['erreur'] = "Aucun compte membre trouvé pour ces identifiants. Merci de ré-essayer";
				$this->load->view('error');
			} else {
				$this->session->set_userdata('user', $result['id']);
				$this->load->view('dashboard_index');
			}
			} catch(Exception $e){
				error_log($e->getMessage());
				$app['erreur'] = "Une erreur a été rencontrée (voir les fichiers de logs). Merci de ré-essayer";
				$this->load->view('error');
			}
		} else {
			if(!$this->input->post('login')){
				$app['erreur'][] = "Email non trouvé";
			}
			if(!$this->input->post('password')){
				$app['erreur'][] = "Password non trouvé";
			}
			$this->load->view('error');
		}


	}

	public function inscription_finish()
	{
		if ($_FILES['photo'] && is_uploaded_file($_FILES['photo']['tmp_name']) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK &&
				$this->input->post('email') && $this->input->post('password')) {
			try {
			$this->load->model('Mlogin');
			$u = array();
			if(preg_match($this->rb_email_regex, $this->input->post('email'))){
				$u['email'] = htmlentities($this->input->post('email'));
			} else {
				$app['erreur'] = "Votre email doit être du type <strong>prenom.nom@u-psud.fr</strong>";
				$this->load->view('error');
			}
			$name = $_FILES["photo"]["name"];
			$uploads_dir = '/home/romain/www/rbeuque74.fr/others/polytech/spips/killer/img';
			if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "$uploads_dir/$name")){
				die('unable to move file');
			}
			$u['password'] = sha1($this->input->post('password')."Bi@tChPlZZZ");
			$u['prenom'] = htmlentities($this->input->post('prenom'));
			$u['nom'] = htmlentities($this->input->post('nom'));
			$u['mot_de_passe'] = htmlentities($this->input->post('passphrase'));
			$u['photo'] = "img/$name";
			$this->Mlogin->inscription_membre($u);
			$this->load->view('welcome_index');
			} catch (Exception $e)	{
				error_log($e->getMessage());
				$app['erreur'] = "Une erreur a été rencontrée (voir les fichiers de logs). Merci de ré-essayer";
				$this->load->view('error');
			}
		} else {
			if(!$_FILES['photo']){
				$app['erreur'][] = "No photo uploaded";
			}
			if(!is_uploaded_file($_FILES['photo']['tmp_name'])){
				$app['erreur'][] = "File not uploaded";
			}
			if($_FILES["photo"]["error"] != UPLOAD_ERR_OK){
				$app['erreur'][] = "File uploaded but with error";
			}
			if(!$this->input->post('email')){
				$app['erreur'][] = "email not found";
			}
			if(!$this->input->post('password')){
				$app['erreur'][] = "password not found";
			}
			$this->load->view('error');			
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
