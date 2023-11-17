
// Task 1:
// Write a Laravel route to handle a GET request for '/about' URL. The route should call
// the 'AboutController' and the 'index' method.

// AboutController.php
namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * @return string
     */
    public function index(): string
    {
        return "About Page";
    }
}

// web.php
use App\Http\Controllers\AboutController;

Route::get("/about", [AboutController::class, "index"])->name("about.index");


//Task 2:
// Create a function called 'login' inside the 'UserController' class that takes two parameters: 'email'
// and 'password'. This function should return a message saying 'Login successful' if the email and password
// match, and 'Invalid credentials' if they didn't match.

// UserController.php
namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * @param string $email
     * @param string $password
     * @return string
     */
    public function login(string $email, string $password): string
    {
        $validCredentials = $this->validateCredentials($email, $password);

        if ($validCredentials) {
            return "Login successful";
        } else {
            return "Invalid credentials";
        }
    }

    /**
     * This method for validating credentials.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    private function validateCredentials(string $email, string $password): bool
    {
        $validEmail = "chanchal@gmail.com";
        $validPassword = "12345";

        return $email === $validEmail && $password === $validPassword;
    }
}
