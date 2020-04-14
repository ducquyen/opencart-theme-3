<?php
class ControllerCommonHome extends Controller {
	public function index() {

		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		$this->document->setTitle($this->config->get('config_meta_title')[$this->session->data['language']]);

		$this->document->setDescription($this->config->get('config_meta_description')[$this->session->data['language']]);
		$this->document->setKeywords($this->config->get('config_meta_keyword')[$this->session->data['language']]);


		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}
