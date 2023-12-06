<?php 
include 'header.php';
?>
<div class="card">
    <div class="card-body">
        <div class="card-header">
            <h2>Profile</h2>
        </div>
        <div class="card-footer">
            <div class="card-text">
                <h3>Name: <?php echo $_SESSION['username'] ?></h3>
                <h3>Age: <?php echo $_SESSION['age'] ?></h3>
                <h3>Specialty: <?php echo $_SESSION['specialty'] ?></h3>
            </div>
        </div>
    </div>
</div>
<?php 
include 'footer.php';
?>