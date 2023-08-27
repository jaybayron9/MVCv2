<?php
    include 'partials/header.php'; 
    include 'partials/nav.php'; 

    use Query\Queries;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $db = new Queries();
        $db->insert('accounts', [
            'name', 'password'
        ], [
            $_POST['name'], 'pass'
        ]);
    }
?>

<h1>HOME</h1>

<form action="/" method="POST">
    <input id="name" type="text" name="name">
    <button type="submit">Alert</button>
</form> 

<?php 
    include 'partials/footer.php'; 
?>