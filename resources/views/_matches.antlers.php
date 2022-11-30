<?php
$lastMatch = json_decode(file_get_contents(storage_path("last_fixture.json")));
$nextMatch = json_decode(file_get_contents(storage_path("next_fixture.json")));
?>
<div class="space-y-4">
    <div class="bg-white w-full divide-y divide-gray-200">
        <div class="p-4 font-bold uppercase flex justify-between text-sm md:text-base">
            <div>Naslednja tekma</div>
            <div><?php echo date("d.m.Y", $nextMatch->fixture->timestamp); ?> ob <?php echo date("H:i", $nextMatch->fixture->timestamp); ?></div>
        </div>
        <div class="flex justify-between items-center p-4">
            <img src="<?php echo $nextMatch->teams->home->logo; ?>" alt="" class="hidden md:block w-24" />
            <div class="flex space-x-2 md:space-y-0 md:grid md:grid-cols-3 md:gap-4 md:text-xl font-semibold">
                <div class="md:text-right flex items-center"><?php echo $nextMatch->teams->home->name; ?></div>
                <div class="md:text-center md:text-4xl font-bold w-32">&dash;</div>
                <div class="md:text-left flex items-center"><?php echo $nextMatch->teams->away->name; ?></div>
            </div>
            <img src="<?php echo $nextMatch->teams->away->logo; ?>" alt="" class="hidden md:block w-24" />
        </div>
    </div>
    <div class="bg-white w-full divide-y divide-gray-200">
        <div class="p-4 font-bold uppercase flex justify-between text-sm md:text-base">
            <div>Zadnja tekma</div>
            <div><?php echo date("d.m.Y", $lastMatch->fixture->timestamp); ?> ob <?php echo date("H:i", $lastMatch->fixture->timestamp); ?></div>
        </div>
        <div class="flex justify-between items-center p-4">
            <img src="<?php echo $lastMatch->teams->home->logo; ?>" alt="" class="hidden md:block w-24"/>
            <div class="flex space-x-2 md:space-y-0 md:grid md:grid-cols-3 md:gap-4 md:text-xl font-semibold">
                <div class="md:text-right flex items-center">
                    <?php echo $lastMatch->teams->home->name; ?>
                </div>
                <div class="md:text-center md:text-4xl font-bold w-32">
                    <?php echo $lastMatch->goals->home; ?>
                    &dash;
                    <?php echo $lastMatch->goals->away; ?>
                </div>
                <div class="md:text-left flex items-center">
                    <?php echo $lastMatch->teams->away->name; ?>
                </div>
            </div>
            <img src="<?php echo $lastMatch->teams->away->logo; ?>" alt="" class="hidden md:block w-24"/>
        </div>
    </div>
</div>
