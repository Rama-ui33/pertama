<!-- login_admin.php -->
<?php
include('includes/header.php');
?>
<div class="container mt-5">
  <h2 class="text-center">Login Admin</h2>
  <form action="dashboard_admin.php" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-dark">Login</button>
  </form>
</div>
<?php
include('includes/footer.php');
?>