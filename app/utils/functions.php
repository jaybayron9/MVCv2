<?php 

function view($viewName) { 
    include 'resources/views/' . $viewName . '.php';
} 

function json($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
}