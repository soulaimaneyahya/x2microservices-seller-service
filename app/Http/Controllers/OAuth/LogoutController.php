<?php

namespace App\Http\Controllers\OAuth;

use Illuminate\Http\Request;
use Laravel\Passport\Token;
use Laravel\Passport\RefreshToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\JsonResponse;

class LogoutController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $token = $request->user()?->token();

        if ($token === null) {
            throw new UnauthorizedException('Invalid token', 401);
        }

        DB::beginTransaction();

        try {
            Token::where('id', $token->id)->update([
                'revoked' => true,
                'expires_at' => \Carbon\Carbon::now(),
                'deleted_at' => \Carbon\Carbon::now(),
            ]);

            RefreshToken::where('access_token_id', $token->id)->update([
                'revoked' => true,
                'expires_at' => \Carbon\Carbon::now(),
                'deleted_at' => \Carbon\Carbon::now(),
            ]);

            DB::commit();

            return response()->json(['message' => 'Logged out successfully.']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
}
