<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\Http;

class WeatherCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'clima {city : Forneça o nome da Cidade para consultar o clima}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Retorna o clima atual de uma cidade usando a API OpenWeatherMap';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $city = $this->argument('city');
        $apiKey = env('OPENWEATHER_API_KEY'); // Load API key from .env file

        if (!$apiKey) {
            $this->error('Chave da API não encontrada, verifique seu arquivo .env.');
            return;
        }

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric', // Celsius
            'lang' => 'pt_br',  // Portuguese (Brazil)
        ]);

        if ($response->failed()) {
            $this->error('Falha ao obter os dados, verifique o nome da cidade e tente novamente.');
            return;
        }

        $data = $response->json();

        $this->info("Clima para {$data['name']}:");
        $this->line("Temperatura: {$data['main']['temp']}°C");
        $this->line("Condição: {$data['weather'][0]['description']}");
        $this->line("Humidade: {$data['main']['humidity']}%");
        $this->line("Velocidade do Vento: {$data['wind']['speed']} m/s");
    }

    /**
     * Define the command's schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule)
    {
        // Schedule the command (optional)
    }
}