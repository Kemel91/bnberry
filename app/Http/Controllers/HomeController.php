<?php

namespace App\Http\Controllers;

use App\Services\UrlService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Конструктор
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Показываем домашнюю страницу
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Сохранение ссылки
     * @param Request $request
     * @param UrlService $service
     * @return RedirectResponse
     */
    public function store(Request $request, UrlService $service)
    {
        $validator = Validator::make($request->post(),
            [
                'url' => 'required|url',
                'user_short_url' => 'nullable|string|max:10|unique:urls,short_url',
                'date' => 'nullable|date'
            ],
            [
                'url.required' => 'Поле обязательно к заполнению',
                'url.url' => 'Неверный формат адреса',
                'user_short_url.unique' => 'Введенное сокращение уже существует'
            ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $url = $service->save($validator->validated());

        return redirect()->back()->with('short_url', $url->getAttribute('short_url'));
    }


}
