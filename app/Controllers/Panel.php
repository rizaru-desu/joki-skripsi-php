<?php

namespace App\Controllers;

use App\Models\UserModel;

class Panel extends BaseController
{
	public function index()
	{

		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
											->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('dashboard');

			}
		}


		echo view('template/header', $data);
		echo view('panel', $data);
		echo view('template/footer', $data);
	}


	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'privilage' => $user['privilage'],
			'isLoggedIn' => true,
			
		];

		session()->set($data);
		return true;
	}


	public function panelRegister()
	{

		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'privilage' => 'required'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
					'privilage' => $this->request->getVar('privilage')
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
		}

		echo view('template/header', $data);
		echo view('panel-register', $data);
		echo view('template/footer', $data);
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
}