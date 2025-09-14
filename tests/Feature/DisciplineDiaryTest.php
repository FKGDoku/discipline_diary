<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\DisciplineDiary;

class DisciplineDiaryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_main_page_returns_ok_response()
    {

        $response = $this->get('/');
        // 2. Assert (Проверка): Убеждаемся, что страница загрузилась успешно (статус 200)
        $response->assertStatus(200);
        // ...и что в ней есть заголовок "Дневник Дисциплины"
        $response->assertSeeText('Дневник Дисциплины');
    }

    /** @test */
    public function a_user_can_create_a_new_note()
    {
        // 0. Arrange (Подготовка): Данные для формы
        $formData = [
            'it_minutes' => 60,
            'music_minutes' => 30,
            'english_minutes' => 45,
            'reading_minutes' => 15,
            'sport_approach' => 10,
        ];

        // 1. Acting (Действие): Отправляем POST-запрос на маршрут 'insert'
        $response = $this->post(route('store'), $formData);

        // 2. Assert (Проверка):
        // ...Произошел редирект на главную
        $response->assertRedirect('/');
        // ...В базе данных должна появиться 1 запись
        $this->assertDatabaseCount('discipline_diaries', 1);
        // ...И эта запись содержит правильное значение total_minutes
        $this->assertDatabaseHas('discipline_diaries', [
            'total_minutes' => 150, // 60+30+45+15
        ]);
    }

    /** @test */
    public function creating_a_note_requires_all_fields()
    {
        // 1. Acting (Действие): Пытаемся отправить пустую форму
        $response = $this->post(route('store'), []);

        // 2. Assert (Проверка):
        // ...Будет выброшена ошибка валидации, и нас вернет назад (статус 302)
        $response->assertStatus(302);
        // ...В сессии должны быть ошибки валидации
        $response->assertSessionHasErrors(['it_minutes', 'music_minutes', 'english_minutes', 'reading_minutes', 'sport_approach']);
    }
}
