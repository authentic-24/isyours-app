<h1>Welcome to Our Platform, <?php echo e($user->first_name); ?>!</h1>

<p>Thank you for registering. We're excited to have you on board.</p>

<p>Your account details:</p>
<ul>
    <li>Email: <?php echo e($user->email); ?></li>
    <li>User Type: <?php echo e(ucfirst($user->user_type)); ?></li>
</ul>

<p>If you have any questions, feel free to contact us.</p><?php /**PATH C:\laragon\www\isyours\resources\views/emails/welcome.blade.php ENDPATH**/ ?>