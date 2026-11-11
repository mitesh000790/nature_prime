<?php

declare(strict_types=1);

/**
 * Supported page languages.
 *
 *   ?lang=en (or no parameter) -> English
 *   ?lang=zh                   -> Traditional Chinese
 */
enum Lang: string
{
    case En = 'en';
    case Zh = 'zh';

    /**
     * Resolve the language from the raw ?lang= query value.
     * Anything missing, unknown or malformed (e.g. ?lang[]=x) falls back to English.
     */
    public static function fromQuery(mixed $value): self
    {
        if (!is_string($value)) {
            return self::En;
        }

        return self::tryFrom(strtolower(trim($value))) ?? self::En;
    }

    /** BCP 47 tag for <html lang="..."> (lets browsers pick proper Traditional Chinese fonts). */
    public function htmlLang(): string
    {
        return match ($this) {
            self::En => 'en',
            self::Zh => 'zh-Hant',
        };
    }

    /** The language the header switcher links to. */
    public function other(): self
    {
        return match ($this) {
            self::En => self::Zh,
            self::Zh => self::En,
        };
    }
}

/** Escape a string for safe output in HTML text or attribute values. */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}

/**
 * Escape each line and join them with <br> tags.
 *
 * @param list<string> $lines
 */
function lines(array $lines): string
{
    return implode('<br>', array_map(e(...), $lines));
}

/**
 * Load the text strings for a language from includes/lang/{code}.php.
 * The file name comes from the enum value, never from user input.
 *
 * @return array<string, string|list<string>>
 */
function translations(Lang $lang): array
{
    return require __DIR__ . '/lang/' . $lang->value . '.php';
}

/**
 * Public URL for a file inside the /assets folder, with a cache-busting
 * version so browsers pick up changed files immediately.
 *
 * Example: asset('css/style.css') -> "assets/css/style.css?v=1731300000"
 */
function asset(string $path): string
{
    $path = ltrim($path, '/');
    $url = 'assets/' . implode('/', array_map(rawurlencode(...), explode('/', $path)));

    $file = dirname(__DIR__) . '/assets/' . $path;
    $mtime = is_file($file) ? filemtime($file) : false;

    return $mtime === false ? $url : $url . '?v=' . $mtime;
}

/** Build a tel: link target from a display phone number ("604-270-9900" -> "tel:6042709900"). */
function tel_href(string $phone): string
{
    return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
}
