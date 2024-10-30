<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception) {
        // Jika pengecualian adalah 'Unauthenticated'
        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            $returnUrl = $request->query('ReturnURL') ?? '/auth/login';
            return redirect($returnUrl)->with('alert', [
                'bg' => 'danger',
                'message' => 'Anda harus login terlebih dahulu.'
            ]);
        }

        // Tangani semua exception lainnya
        if ($request->expectsJson()) {
            return response()->json(['error' => $exception->getMessage()], 500);
        } else {
            return redirect()->back()->with('alert', ['bg' => 'danger', 'message' => 'Terjadi kesalahan: ' . $exception->getMessage()]);
        }

        // Tangani validasi dan exception lainnya secara umum
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            if ($request->expectsJson()) {
                // Untuk API, kembalikan kesalahan dalam format JSON
                return response()->json($exception->errors(), 422);
            }
            // Untuk non-API, arahkan kembali dengan error
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    
        // Tangani pengecualian lain berdasarkan tipe request
        if ($request->is('api/*')) {
            // Jika request menuju endpoint API, kembalikan error JSON
            return response()->json([
                'error' => $exception->getMessage(),
                'exception' => get_class($exception),
                'message' => $exception->getMessage()
            ], 500);
        }
    
        // Tangani pengecualian untuk endpoint non-API
        if ($request->wantsJson()) {
            // Jika request adalah AJAX atau mengharapkan JSON
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    
        // Untuk permintaan non-API dan tidak ingin JSON, redirect kembali dengan pesan error
        return redirect()->back()->with('alert', [
            'bg' => 'danger',
            'message' => 'Terjadi kesalahan: ' . $exception->getMessage()
        ]);
    }
}
