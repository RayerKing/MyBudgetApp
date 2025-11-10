<!-- ========================================================== -->
<!-- === HTML STRUKTURA PRO VYKRESLENÍ tabulky pro overview === -->
<!-- ========================================================== -->


<table class="overview_table">
    <thead class="overview_thead">
        <tr class="overview_tr">
            <th>Název</th>
            <th>Popis</th>

            <th>Kategorie</th>
            <th>Cena</th>
            <th>Datum</th>
            <th>Úprava</th>
        </tr>
    </thead>
    <?php

    if ($count === 0):

    ?>
        <tbody class="overview_tbody">
            <tr class="overview_tr">
                <td colspan="6">V tabulce nejsou žádné transakce</td>
            </tr>
        </tbody>
    <?php

    else:
    ?>
        <tbody class="overview_tbody">
            <?php

            foreach ($rows as $x):

            ?>
                <tr class="overview_tr">
                    <td><?= htmlspecialchars($x["name"]) ?></td>
                    <td><?= htmlspecialchars($x["description"]) ?></td>
                    <?php
                    if (htmlspecialchars($x["category"]) == "doprava"): ?>
                        <td>Doprava</td>
                    <?php elseif (htmlspecialchars($x["category"]) == "jidlo"): ?>
                        <td>Potraviny</td>
                    <?php elseif (htmlspecialchars($x["category"]) == "zabava"): ?>
                        <td>Zábava</td>
                    <?php elseif (htmlspecialchars($x["category"]) == "najem"): ?>
                        <td>Bydlení</td>
                    <?php elseif (htmlspecialchars($x["category"]) == "prijem"): ?>
                        <td>Příjem</td>
                    <?php elseif (htmlspecialchars($x["category"]) == "sporeni"): ?>
                        <td>Spoření</td>
                    <?php elseif (htmlspecialchars($x["category"]) == "ostatni"): ?>
                        <td>Ostatní</td>
                    <?php endif ?>



                    <?php
                    if ($x["kind"] == "plus"):
                    ?>
                        <td>
                            <em class="green_number">+ <?= htmlspecialchars(number_format($x["value"], 0, ',', ' ')) ?>
                            </em>

                        </td>
                    <?php
                    else : ?>
                        <td><em class="red_number">- <?= htmlspecialchars(number_format($x["value"], 0, ',', ' ')) ?>
                            </em></td>
                    <?php endif ?>
                    <td><?= htmlspecialchars($x["transaction_date"]) ?></td>
                    <td class="overview_button_flex">
                        <button type="button" data-id='<?= htmlspecialchars($x["id"]) ?>' class="overview_buttons btn_edit"><i class="fa-solid fa-pencil"></i></button>
                        <button type="button" data-id='<?= htmlspecialchars($x["id"]) ?>' class="overview_buttons btn_delete"><i class="fa-solid fa-xmark"></i></button>
                    </td>
                </tr>


            <?php endforeach ?>

        </tbody>
    <?php

    endif

    ?>

</table>