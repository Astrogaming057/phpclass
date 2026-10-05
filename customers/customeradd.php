<?php
$currentPage = 'customers';
$error = '';

$states = [
    'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas',
    'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware',
    'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho',
    'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas',
    'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland',
    'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi',
    'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada',
    'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York',
    'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma',
    'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina',
    'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah',
    'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia',
    'WI' => 'Wisconsin', 'WY' => 'Wyoming', 'DC' => 'District of Columbia',
];

$fields = [
    'first' => '',
    'last' => '',
    'address' => '',
    'city' => '',
    'state' => '',
    'zip' => '',
    'phone' => '',
    'email' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($fields as $name => $unused) {
        $fields[$name] = trim($_POST[$name] ?? '');
    }

    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if (
        $fields['first'] === '' ||
        $fields['last'] === '' ||
        $fields['address'] === '' ||
        $fields['city'] === '' ||
        $fields['state'] === '' ||
        $fields['zip'] === '' ||
        $fields['phone'] === '' ||
        $fields['email'] === '' ||
        $password === '' ||
        $confirmPassword === ''
    ) {
        $error = 'Please fill out all fields.';
    } elseif (!isset($states[$fields['state']])) {
        $error = 'Please select a valid state.';
    } elseif (!preg_match('/^\d{5}$/', $fields['zip'])) {
        $error = 'Zip code must be 5 digits.';
    } elseif (!preg_match('/^\(\d{3}\)\d{3}-\d{4}$/', $fields['phone'])) {
        $error = 'Phone must match (###)###-####.';
    } elseif (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Password verification failed. Passwords do not match.';
    } else {
        try {
            include __DIR__ . '/../includes/db.php';

            $stmt = mysqli_prepare(
                $con,
                'INSERT INTO customers (`first`, `last`, address, city, state, zip, phone, email, password)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
            );
            mysqli_stmt_bind_param(
                $stmt,
                'sssssssss',
                $fields['first'],
                $fields['last'],
                $fields['address'],
                $fields['city'],
                $fields['state'],
                $fields['zip'],
                $fields['phone'],
                $fields['email'],
                $password
            );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header('Location: index.php');
            exit;
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    }
}

function fieldValue(array $fields, string $name): string
{
    return htmlspecialchars($fields[$name] ?? '');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Izaiah's Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/css/customers/styles.css">
</head>
<body>
<div class="site">
    <header class="panel site-header">
        <?php include __DIR__ . '/../includes/header.php'; ?>
        <nav class="navbar">
            <?php include __DIR__ . '/../includes/nav.php'; ?>
        </nav>
    </header>

    <main class="panel site-main">
        <h2 class="create-title">Create Account</h2>

        <form class="customer-form" method="post" action="customeradd.php" id="customerAddForm">
            <?php if ($error !== ''): ?>
                <p class="status"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <fieldset>
                <legend>Customer</legend>
                <div class="form-row">
                    <label for="first">First Name:</label>
                    <input type="text" id="first" name="first" required maxlength="50"
                           value="<?php echo fieldValue($fields, 'first'); ?>">
                </div>
                <div class="form-row">
                    <label for="last">Last Name:</label>
                    <input type="text" id="last" name="last" required maxlength="50"
                           value="<?php echo fieldValue($fields, 'last'); ?>">
                </div>
                <div class="form-row">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required
                           placeholder="(###)###-####"
                           pattern="\(\d{3}\)\d{3}-\d{4}"
                           title="Format: (###)###-####"
                           value="<?php echo fieldValue($fields, 'phone'); ?>">
                </div>
                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required maxlength="100"
                           value="<?php echo fieldValue($fields, 'email'); ?>">
                </div>
            </fieldset>

            <fieldset>
                <legend>Address</legend>
                <div class="form-row">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required maxlength="100"
                           value="<?php echo fieldValue($fields, 'address'); ?>">
                </div>
                <div class="form-row">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required maxlength="50"
                           value="<?php echo fieldValue($fields, 'city'); ?>">
                </div>
                <div class="form-row">
                    <label for="zip">Zip Code:</label>
                    <input type="text" id="zip" name="zip" required
                           placeholder="5 Digit Zip Code"
                           pattern="\d{5}"
                           title="5 digit zip code"
                           value="<?php echo fieldValue($fields, 'zip'); ?>">
                </div>
                <div class="form-row">
                    <label for="state">State:</label>
                    <select id="state" name="state" required>
                        <option value="">Please Select a State</option>
                        <?php foreach ($states as $code => $name): ?>
                            <option value="<?php echo htmlspecialchars($code); ?>"
                                <?php echo $fields['state'] === $code ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </fieldset>

            <fieldset>
                <legend>Security</legend>
                <div class="form-row">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required minlength="6">
                </div>
                <div class="form-row">
                    <label for="confirmPassword">Password Verification:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword"
                           required minlength="6" placeholder="re-enter password">
                </div>
            </fieldset>

            <div class="actions">
                <button type="submit">Create Account</button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <a class="back-link" href="index.php">Back to Customers</a>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
<script src="/js/customers/index.js"></script>
</body>
</html>
