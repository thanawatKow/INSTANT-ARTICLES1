<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Facebook\InstantArticles\Client\Client;
use Facebook\InstantArticles\Transformer\Transformer;
class Welcome extends CI_Controller {
	public function __construct()
{
    parent::__construct();
		$ia_client = Client::create(
	    '1920957664803342'
	);
	// Push the article to your Facebook Page
	$ia_client->importArticle($my_article);
	// Unpublish an article from your Facebook Page
	$ia_client->removeArticle($canonical_url);
}
	public function index()
	{
		$this->load->view('index');
	}
}
