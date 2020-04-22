<style type="text/css">
    table.page_header {
        width: 100%;
        border: none;
        padding: 2mm;
    }

    table.page_content {
        width: 100%;
        border: none;
        padding: 3mm;
    }

    .separator {
        width: 100%;
        height: 1mm;
        background-color: #CA2046;
        margin-bottom: 10mm;
    }

    table.page_content_half {
        width: 50%;
        border: none;
        padding: 2mm;
    }

    table.page_footer {
        width: 100%;
        border: none;
        padding: 2mm;
    }

    span.space_big {
        width: 15mm;
        padding: 5mm;
        background-color: red;
        display: table;
    }

    span.space_small {
        width: 5mm;
        padding: 5mm;
        background-color: red;
        display: table;
    }

    div.circle {
        width: 3mm;
        height: 3mm;
        background-color: #000;
        border-radius: 200px;
        display: table;
    }

    .empty {
        color: #97C8EE;
    }
</style>
<page backtop="50mm" backbottom="20mm" backleft="5mm" backright="5mm">
    <page_header>
        <table class="page_header" style="padding: 0 2mm 7mm;">
            <tr>
                <td style="width: 100%; text-align: center; padding: 10mm 10mm 5mm 10mm">
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%;">
            <td style="width: 100%; text-align: center;">
            </td>
        </table>
    </page_footer>
    <table class="page_content">
        <tr style="width: 100%;">
            <td style="padding: 0; font-weight: bold;">Projet: <?= $content['projet'] ?></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0; font-weight: bold;"><?= $content['firstname'] . ' ' . $content['lastname'] ?></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0;"><?= $content['address'] ?></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0;"><?= $content['postal'] ?>, <?= $content['city'] ?></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0;"><?= $content['date'] ?></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0;"><?= $content['mail'] ?></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0;"><?= $content['phone'] ?></td>
        </tr>
    </table>

    <table class="page_content">
        <tr style="width: 100%;">
            <td style="padding: 0;">Facture: <span style="font-weight: bold;">N*<?= $content['id'] ?></span></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0;">SIREN : <span style="font-weight: bold;"><?= $content['siren'] ?></span></td>
        </tr>
        <tr style="width: 100%;">
            <td style="padding: 0;">SIRET : <span style="font-weight: bold;"><?= $content['siret'] ?></span></td>
        </tr>
    </table>

    <table class="page_content">
        <tr style="width: 100%;">
            <td style="padding: 3mm 0; font-weight: bold;">Intitulé de la prestation :</td>
        </tr>
        <tr style="width: 100%;">
            <td style="width: 100%; padding: 2mm 4mm;">
                <?= $content['description'] ?>, pour <?= $content['client'] ?>
            </td>
        </tr>
    </table>

    <table class="page_content">
        <tr style="width: 100%;">
            <th style="padding: 3mm 0; font-weight: bold; width: 33%;">Temps de travail estimé</th>
            <th style="padding: 3mm 0; font-weight: bold; width: 33%;">Tarif jour</th>
            <th style="padding: 3mm 0; font-weight: bold; width: 33%;">Total</th>
        </tr>
        <?php foreach ($content['items'] as $item): ?>
            <tr style="width: 100%;">
                <td style="width: 33%; padding: 2mm 0;">
                    <?= $item['label'] ?> : <span style="font-weight: bold;"><?= $item['days'] ?> jour(s)</span>
                </td>
                <td style="width: 33%; padding: 2mm 0;">
                    <?= $item['pricePerDay'] ?> par jour
                </td>
                <td style="width: 33%; padding: 2mm 0;">
                    <?= $item['total'] ?> €
                </td>
            </tr>
        <?php endforeach; ?>
        <tr style="width: 100%;">
            <td style="width: 33%; padding: 2mm 0;">
            </td>
            <td style="width: 33%; padding: 2mm 0; font-weight: bold;">
                TOTAL
            </td>
            <td style="width: 33%; padding: 2mm 0; font-weight: bold;s">
                <?= $content['total'] ?> €
            </td>
        </tr>
    </table>

    <table class="page_content">
        <tr style="width: 100%;">
            <td style="width: 100%; padding: 2mm 0; font-weight: bold;">
                <?= $content['notice'] ?>
            </td>
        </tr>
    </table>
</page>
