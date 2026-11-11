<?php

declare(strict_types=1);

/**
 * Traditional Chinese text (index.php?lang=zh).
 * Plain text only - everything is HTML-escaped when printed.
 * Arrays named *_lines are printed one per line (joined with <br>).
 */
return [
    'title' => "Nature's Prime",

    // Header
    'switch_label' => 'English',
    'mobile_logo' => 'logo.svg',

    // Banner ("\u{00A0}" is a non-breaking space, same as &nbsp; in the original page)
    'banner_lines' => [
        "健康源於自然 \u{00A0} 品質見證承諾",
    ],

    // About us
    'about_heading' => '高品質補充劑，專業經驗保證',
    'about_text' => '歡迎來到 Nature’s Prime，我們不僅提供您可信賴的高品質天然健康補充劑，更是您健康旅途中的夥伴。'
        . '我們在健康和保健行業擁有多年的經驗，致力於為您提供最佳產品，以確保我們的客戶得到的不僅是營養補充，更是品質與信心的保證。',

    // Promise
    'promise_heading' => '高品質補充劑為您帶來更健康的生活',
    'promise_paragraphs' => [
        '在 Nature’s Prime，我們相信大自然的力量可以治愈、滋養和恢復活力。因此，我們提供各種精心挑選和嚴格測試的天然補充劑，'
            . '確保最高的品質和功效標準。我們豐富的產品系列包括維生素、礦物質、草本提取物和專門設計的補充劑，旨在滿足多樣化的健康需求和生活方式。',
        '我們的卓越承諾不僅僅體現在產品上。我們努力通過提供專業建議和個性化服務來教育和賦予客戶力量。'
            . '無論您尋找特定的補充劑還是需要在健康旅程上的指導，我們富有知識的團隊都在這裡，幫助您做出明智的決定。',
    ],

    // Manufacturer / brands
    'brands_heading' => '優質補充劑提升優質生活',
    'brands_text' => '加入 Nature’s Prime 社群，探索我們的高品質天然健康補充劑如何增進您的健康。一起自然達到最佳健康。歡迎免費諮詢，我們隨時為您服務！',

    // Footer
    'address_heading' => '地址',
    'address_lines' => ['7080 River Rd #104,', 'Richmond, BC V6X 1X5'],
    'hours_heading' => '營業時間',
    'hours_lines' => ['星期一至星期五', '9:30-18:00 PST'],
    'contact_heading' => '聯繫我們',
    'copyright' => "Nature's Prime All Rights Reserved. All other trademarks and copyrights are the "
        . 'property of their respective holders.',
];
