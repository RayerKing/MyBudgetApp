<!-- ========================================================== -->
<!-- === HTML STRUKTURA PRO VYKRESLENÍ tabulky pro overview === -->
<!-- ========================================================== -->

<?php

include "edit_form.php";

?>

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
                <tr class="overview_tr" data-name="<?= htmlspecialchars($x["name"]) ?>"
                    data-description="<?= htmlspecialchars($x["description"]) ?>"
                    data-category="<?= htmlspecialchars($x["category"]) ?>"
                    data-value="<?= htmlspecialchars(number_format($x["value"], 0, ',', ' ')) ?>"
                    data-date="<?= htmlspecialchars($x["transaction_date"]) ?>">
                    <td><span class="td_name"><?= htmlspecialchars($x["name"]) ?></span></td>
                    <td><span class="td_description"><?= htmlspecialchars($x["description"]) ?></span></td>
                    <?php if (htmlspecialchars($x["category"]) == "doprava"): ?>
                        <td><span class="td_category">Doprava</span></td>
                    <?php elseif (htmlspecialchars($x["category"]) == "jidlo"): ?>
                        <td><span class="td_category">Potraviny</span></td>
                    <?php elseif (htmlspecialchars($x["category"]) == "zabava"): ?>
                        <td><span class="td_category">Zábava</span></td>
                    <?php elseif (htmlspecialchars($x["category"]) == "najem"): ?>
                        <td><span class="td_category">Bydlení</span></td>
                    <?php elseif (htmlspecialchars($x["category"]) == "prijem"): ?>
                        <td><span class="td_category">Příjem</span></td>
                    <?php elseif (htmlspecialchars($x["category"]) == "sporeni"): ?>
                        <td><span class="td_category">Spoření</span></td>
                    <?php elseif (htmlspecialchars($x["category"]) == "ostatni"): ?>
                        <td><span class="td_category">Ostatní</span></td>
                    <?php endif; ?>




                    <?php
                    if ($x["kind"] == "plus"):
                    ?>
                        <td>
                            <div class="mobile_price_edit">
                                <span class="td_value"><em class="green_number">
                                        + <?= htmlspecialchars(number_format($x["value"], 0, ',', ' ')) ?>

                                    </em></span>
                            </div>


                        </td>
                    <?php
                    else : ?>
                        <td>
                            <div class="mobile_price_edit">
                                <span class="td_value"><em class="red_number">- <?= htmlspecialchars(number_format($x["value"], 0, ',', ' ')) ?>
                                    </em></span>
                            </div>
                        </td>
                    <?php endif ?>
                    <td><span class="td_date"><?= htmlspecialchars($x["transaction_date"]) ?></span></td>
                    <td class="overview_button_flex">
                        <div class="mobile_edit">
                            <button type="button" data-id='<?= htmlspecialchars($x["id"]) ?>' class="overview_buttons btn_edit"><i class="fa-solid fa-pencil"></i></button>
                            <button type="button" data-id='<?= htmlspecialchars($x["id"]) ?>' class="overview_buttons btn_delete"><i class="fa-solid fa-xmark"></i></button>

                        </div>
                    </td>
                </tr>


            <?php endforeach ?>

        </tbody>
    <?php

    endif

    ?>

</table>