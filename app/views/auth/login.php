<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Job Dating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .glass-effect { backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.95); }
        .input-focus:focus { border-color: #667eea; box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1); }
        .animate-float { animation: float 3s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    
    <!-- Decorative Elements -->
    <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-float"></div>
    <div class="absolute bottom-10 right-10 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-float" style="animation-delay: 2s;"></div>
    
    <div class="relative z-10 w-full max-w-md">
        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <div class="inline-block p-4 bg-white rounded-2xl shadow-lg mb-4">
                <i class="fas fa-briefcase text-4xl text-purple-600"></i>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Welcome Back</h1>
            <p class="text-purple-100">Sign in to continue your journey</p>
        </div>

        <!-- Login Card -->
        <div class="glass-effect rounded-3xl shadow-2xl p-8">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Sign In</h2>
                <p class="text-gray-600">Access your account</p>
            </div>

            <!-- Error Alert -->
            <?php if(isset($error)): ?>
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                        <p class="text-red-700 font-medium"><?= $error ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST" action="/job_dating/public/login" class="space-y-5">
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                
                <!-- Email Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" value="<?= $old['email'] ?? '' ?>" 
                           placeholder="Email Address"
                           class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl input-focus transition-all outline-none <?= isset($errors['email']) ? 'border-red-400' : '' ?>">
                    <?php if(isset($errors['email'])): ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?= $errors['email'][0] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" 
                           placeholder="Password"
                           class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl input-focus transition-all outline-none <?= isset($errors['password']) ? 'border-red-400' : '' ?>">
                    <?php if(isset($errors['password'])): ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <?= $errors['password'][0] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        <span class="ml-2 text-gray-700">Remember me</span>
                    </label>
                    <a href="#" class="text-purple-600 hover:text-purple-700 font-medium">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Sign In
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Don't have an account?</span>
                </div>
            </div>

            <!-- Register Link -->
            <a href="/job_dating/public/register" 
               class="block w-full text-center py-3 border-2 border-purple-600 text-purple-600 rounded-xl font-semibold hover:bg-purple-50 transition-all duration-200">
                <i class="fas fa-user-plus mr-2"></i>
                Create Account
            </a>
        </div>

        <!-- Footer -->
        <p class="text-center text-white text-sm mt-6">
            <i class="fas fa-shield-alt mr-1"></i>
            Secure login with 256-bit encryption
        </p>
    </div>
</body>
</html>
