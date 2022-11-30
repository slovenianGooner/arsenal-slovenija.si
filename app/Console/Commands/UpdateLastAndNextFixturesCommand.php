<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateLastAndNextFixturesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-fixtures';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = env("RAPID_API_URL");
        $key = env("RAPID_API_KEY");
        $teamId = 42;

        $lastFixture = \Http::withHeaders([
            "X-RapidAPI-Key" => "$key"
        ])->get("https://$url/v3/fixtures", [
            "team" => $teamId,
            "last" => 1
        ]);

        if (!isset($lastFixture->json()["response"][0])) {
            return;
        }

        // Write to last_fixture.json file
        $fixture = $lastFixture->json()["response"][0];

        file_put_contents(storage_path("last_fixture.json"), json_encode($fixture));

        $nextFixture = \Http::withHeaders([
            "X-RapidAPI-Key" => "$key"
        ])->get("https://$url/v3/fixtures", [
            "team" => $teamId,
            "next" => 1
        ]);

        if (!isset($nextFixture->json()["response"][0])) {
            return;
        }

        // Write to last_fixture.json file
        $fixture = $nextFixture->json()["response"][0];

        file_put_contents(storage_path("next_fixture.json"), json_encode($fixture));

        return 0;
    }
}
