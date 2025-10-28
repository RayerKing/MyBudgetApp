<!-- HTML STRUKTURA PRO VYKRESLENÍ TABULEK -->


<div class="tabulky">
    <h1 class="h1">Přehled</h1>


    <div class="inner-tabulky">
        <table class="table table-sm table-hover ">
            <caption>Tabulka pro všechno</caption>

            <?php if ($count === 0): ?>
                <tbody>
                    <tr>
                        <td colspan="3">V tabulce nejsou data.</td>
                    </tr>
                </tbody>
            <?php
            else: ?>

                <thead>
                    <tr>
                        <th>Název</th>
                        <th>Částka</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $toShow = ($count > 3) ? array_slice($rows, 0, 3) : $rows;

                    foreach ($toShow as $x): ?>

                        <tr>
                            <td>
                                <?= htmlspecialchars($x["name"]) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($x["value"]) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($x["transaction_date"]) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

                <?php if ($count > 3): ?>
                    <tfoot>
                        <tr>
                            <td>
                                <button class="btn btn-primary btn-sm">Zobrazit všechny</button>
                            </td>
                        </tr>
                    </tfoot>

                <?php endif ?>
            <?php endif ?>
        </table>



        <?php
        // asociativni pole pro $headlines
        // převádí hodnoty sloupce category z databáze na čitelné názvy
        $headlines_categories = [
            "doprava" => "Doprava",
            "jidlo" => "Potraviny",
            "zabava" => "Zábava",
            "najem" => "Bydlení",
            "prijem" => "Příjmy",
            "sporeni" => "Spoření",
            "ostatni" => "Ostatní"
        ];

        ?>

        <?php
        // $categories obsahuje všechny kategorie (každá je klíč → pole transakcí)
        // $category je název konkrétní kategorie (např. 'jidlo')
        // $transactions je pole všech transakcí spadajících pod tuto kategorii
        foreach ($categories as $category => $transactions):
        ?>
            <table class="table table-sm table-hover">
                <caption>
                    <!-- Z pole $headlines, vezme tiutlek pro aktuáloní kategorii dle jejího klíče $category -->
                    <?= htmlspecialchars($headlines_categories[$category]) ?>
                </caption>
                <?php
                if (count($transactions) === 0):
                ?>
                    <tbody>
                        <tr>
                            <td colspan="3">V tabulce nejsou data.</td>
                        </tr>
                    </tbody>
                <?php else: ?>
                    <thead>
                        <tr>
                            <th scope="col">Název</th>
                            <th scope="col">Částka</th>
                            <th scope="col">Datum</th>
                        </tr>
                    </thead>
                    <?php
                    $toShow = array_slice($transactions, 0, 3);
                    ?>
                    <tbody>
                        <?php
                        foreach ($toShow as $x):
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($x["name"]) ?></td>
                                <td><?= htmlspecialchars($x["value"]) ?></td>
                                <td><?= htmlspecialchars($x["transaction_date"]) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                    <?php
                    if (count($transactions) > 3):
                    ?>
                        <tfoot>
                            <tr>
                                <td>
                                    <button type="button" class="btn-success">Zobrazit všechny</button>
                                </td>
                            </tr>
                        </tfoot>
                    <?php endif ?>

                <?php endif ?>
            </table>
        <?php endforeach ?>
    </div>