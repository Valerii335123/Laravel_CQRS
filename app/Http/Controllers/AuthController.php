<?php

namespace App\Http\Controllers;

use App\Exceptions\Auth\UserUnAuthorizedException;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User\UseCase\Registration\Command;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Infrastructure\CommandHandling\CommandBusInterface;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    /**
     * @param \Infrastructure\CommandHandling\CommandBusInterface $commandBus
     */
    public function __construct(
        protected CommandBusInterface $commandBus
    ) {
    }

    /**
     * @param \App\Http\Requests\Auth\RegistrationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registration(RegistrationRequest $request)
    {

        $cmd  = new Command(
            $request->name,
            $request->email,
            $request->password
        );
        $user = $this->commandBus->dispatchNow($cmd);

        return new JsonResponse(['message' => trans('messages.auth.registration.success')], Response::HTTP_OK);
    }

    /**
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\Auth\UserUnAuthorizedException
     */
    public function login(LoginRequest $request)
    {
        $user = \App\Models\User\User::whereEmail($request->email)->first();

        $this->checkPassword($user, $request->password);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'token' => $token
        ];

        return new JsonResponse($response, Response::HTTP_OK);
    }


    /**
     * @param \App\Models\User\User|null $user
     * @param string|null $password
     * @return void
     * @throws \App\Exceptions\Auth\UserUnAuthorizedException
     */
    public function checkPassword(?\App\Models\User\User $user, ?string $password): void
    {
        if (!$user || !Hash::check($password, $user->password)) {
            throw new UserUnAuthorizedException(__('messages.auth.bad_credentials'));
        }
    }

}
