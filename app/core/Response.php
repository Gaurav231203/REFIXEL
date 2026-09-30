<?php
declare(strict_types=1);

namespace App\Core;

class Response
{
    protected int $statusCode = 200;
    protected array $headers = [];
    protected string $content = '';

    public function setStatusCode(int $code): self
    {
        $this->statusCode = $code;
        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }


    public function send(): void
    {
        if (!headers_sent()) {
            http_response_code($this->statusCode);
            foreach ($this->headers as $name => $value) {
                header("{$name}: {$value}");
            }
        }
        echo $this->content;
    }

    public static function json(mixed $data, int $status = 200): self
    {
        $response = new self();
        $response->setStatusCode($status);
        $response->setHeader('Content-Type', 'application/json; charset=utf-8');
        $response->setContent(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public static function xml(string $xml, int $status = 200): self
    {
        $response = new self();
        $response->setStatusCode($status);
        $response->setHeader('Content-Type', 'application/xml; charset=utf-8');
        $response->setContent($xml);
        return $response;
    }

    public static function plain(string $text, int $status = 200): self
    {
        $response = new self();
        $response->setStatusCode($status);
        $response->setHeader('Content-Type', 'text/plain; charset=utf-8');
        $response->setContent($text);
        return $response;
    }

    public static function html(string $content, int $status = 200): self
    {
        $response = new self();
        $response->setStatusCode($status);
        $response->setHeader('Content-Type', 'text/html; charset=utf-8');
        $response->setContent($content);
        return $response;
    }

    public static function redirect(string $url, int $status = 302): self
    {
        // Handle relative vs absolute routing in subfolder
        $appUrl = rtrim((string)Env::get('APP_URL', ''), '/');
        if (str_starts_with($url, '/') && !str_starts_with($url, '//')) {
            $basePath = parse_url($appUrl, PHP_URL_PATH) ?? '';
            if ($basePath !== '' && !str_starts_with($url, $basePath)) {
                $url = rtrim($basePath, '/') . $url;
            }
        }

        $response = new self();
        $response->setStatusCode($status);
        $response->setHeader('Location', $url);
        return $response;
    }
}
