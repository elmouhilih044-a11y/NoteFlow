<?php

require_once __DIR__ . '/../models/Note.php';
require_once __DIR__ . '/../core/Auth.php';

class NoteController
{
    public function index()
    {
        Auth::check();
        $noteModel = new Note();
        $notes = $noteModel->findByUser(Auth::id());
        require __DIR__ . '/../views/notes/index.php';
    }

    public function create()
    {
        Auth::check();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);

            if (empty($title) || empty($content)) {
                $error = "Le titre et le contenu sont obligatoires";
                require __DIR__ . '/../views/notes/create.php';
                return;
            }
            $noteModel = new Note();
            $noteModel->create(Auth::id(), $title, $content);
            header('Location: index.php?page=notes');
            exit();
        }
        require __DIR__ . '/../views/notes/create.php';
    }

    public function show()
    {
        Auth::check();
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(404);
            exit('Note non trouvée');
        }
        $noteModel = new Note();
        $note = $noteModel->findById($id);
        if (!$note) {
            http_response_code(404);
            exit('Note non trouvée');
        }
        if ($note['user_id'] != Auth::id()) {
            http_response_code(403);
            exit('Accès interdit');
        }
        require __DIR__ . '/../views/notes/show.php';
    }

    public function edit()
    {
        Auth::check();
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(404);
            exit('Note non trouvée');
        }
        $noteModel = new Note();
        $note = $noteModel->findById($id);
        if (!$note) {
            http_response_code(404);
            exit('Note non trouvée');
        }
        if ($note['user_id'] != Auth::id()) {
            http_response_code(403);
            exit('Accès interdit');
        }

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);

            if (empty($title) || empty($content)) {
                $error = "Le titre et le contenu sont obligatoires";
                require __DIR__ . '/../views/notes/edit.php';
                return;
            }

            $noteModel->update($id, $title, $content);
            header('Location: index.php?page=notes');
            exit();
        }
        require __DIR__ . '/../views/notes/edit.php';
    }

    public function delete(){
        Auth::check();
        $id=$_GET['id'] ?? null;
        if(!$id){
            http_response_code(404);
            exit("Note non trouvée");
        }
        $noteModel=new Note();
        $note=$noteModel->findById($id);
        if(!$note){
            http_response_code(404);
            exit("Note non trouvée");
        }
        if($note['user_id'] != Auth::id()){
            http_response_code(403);
            exit('Accès interdit');
        }
        $noteModel->delete($id);
        header('Location: index.php?page=notes');
        exit();
    }
}
