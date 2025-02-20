<h1>Welcome to Our Platform, {{ $user->first_name }}!</h1>

<p>Thank you for registering. We're excited to have you on board.</p>

<p>Your account details:</p>
<ul>
    <li>Email: {{ $user->email }}</li>
    <li>User Type: {{ ucfirst($user->user_type) }}</li>
</ul>

<p>If you have any questions, feel free to contact us.</p>