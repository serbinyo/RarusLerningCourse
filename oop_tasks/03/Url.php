<?php
declare(strict_types=1);

require_once __DIR__ . '/UrlInterface.php';

/**
 * Class Url
 *
 * Класс представляет сущность URL
 */
class Url implements UrlInterface
{
    private $scheme;
    private $host;
    private $query;

    /**
     * Url конструктор.
     *
     * Получает строку с url
     * инициализирует свойства или
     * генерирует new InvalidArgumentException
     *
     * @param string $url Uniform Resource Locator
     */
    public function __construct(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $this->parse($url);
        } else {
            throw new InvalidArgumentException('Argument must be an URL.');
        }
    }

    /**
     * Закрытый метод parse выполнят разбор
     * параметров из заданного URL
     *
     * @param $url
     */
    private function parse($url): void
    {
        $parsedUrl = parse_url($url);

        $this->scheme = $parsedUrl['scheme'];
        $this->host = $parsedUrl['host'];

        if (array_key_exists('query', $parsedUrl)) {

            $paramsPairs = explode('&', $parsedUrl['query']);
            $params = [];

            foreach ($paramsPairs as $paramsPair) {
                [$key, $value] = explode('=', $paramsPair);
                $params[$key] = $value;
            }

            $this->query = $params;
        }
    }

    /**
     * @return string сетевой протокол
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * @return string доменное имя хоста
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return array|null   список параметров вида [$name => $value]
     */
    public function getQueryParams(): ?array
    {
        if (!isset($this->query)) {
            return null;
        }
        return $this->query;
    }

    /**
     * Метод getQueryParam возвращает значение параметра
     * по его имени ($key). Если значение не найдено возвращает
     * значение по умолчанию ($default), либо null если значение
     * по умолчанию не заданно.
     *
     * @param string      $key     имя параметра
     * @param string|null $default значение по умолчанию
     *
     * @return string|null          значение параметра
     */
    public function getQueryParam(string $key, string $default = null): ?string
    {
        if (is_array($this->query)
            && array_key_exists($key, $this->query)) {
            return $this->query[$key];
        }
        return $default;
    }
}
