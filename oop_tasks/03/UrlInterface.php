<?php
declare(strict_types=1);

/**
 * Interface UrlInterface
 */
interface UrlInterface
{
    /**
     * @return string сетевой протокол
     */
    public function getScheme(): string;

    /**
     * @return string доменное имя хоста
     */
    public function getHost(): string;

    /**
     * @return array|null   список параметров вида [$name => $value]
     */
    public function getQueryParams(): ?array;

    /**
     * Метод getQueryParam возвращает значение параметра
     * по его имени ($key). Если значение не найдено возвращает
     * значение по умолчанию ($default), либо null если значение
     * по умолчанию не заданно.
     *
     * @param string      $key      имя параметра
     * @param string|null $default  значение по умолчанию
     *
     * @return string|null          значение параметра
     */
    public function getQueryParam(string $key, string $default = null): ?string;
}