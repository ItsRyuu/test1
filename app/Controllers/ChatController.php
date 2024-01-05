// ChatController.php

class ChatController extends CI_Controller {
public function getMessages() {
// Logic untuk mendapatkan pesan dari database atau sumber lainnya
$messages = $this->chat_model->getMessages();
$this->output->set_content_type('application/json')->set_output(json_encode($messages));
}
}