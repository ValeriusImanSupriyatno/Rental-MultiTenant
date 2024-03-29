<?php
/**
 * Skripsi
 *
 * @package   Rental
 * @author    Valerius Iman Supriyatno
 * @copyright 2021 Multi Mutiara Rental.
 */

namespace App\Frame\System\Session;

/**
 *
 *
 * @package    app
 * @subpackage Frame\System\Session
 * @author     Valerius Iman Supriyatno
 * @copyright  2021 Multi Mutiara Rental.
 */
class SystemSettingSession
{
    /**
     * Property to store all the right for current page.
     *
     * @var array
     */
    private $Data;

    /**
     * SystemSettingSession constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->Data = $data;
    }

    /**
     * Function to get user id
     * @return int
     */
    public function getId(): int
    {
        return $this->getIntValue('ss_id');
    }

    /**
     * Function to get user id
     *
     * @param array $data to store the data.
     * @return void
     */
    public function setData(array $data): void
    {
        $this->Data = $data;
    }

    /**
     * Function to get system name space
     *
     * @return string
     */
    public function getNameSpace(): string
    {
        $ns = $this->getStringValue('ss_name_space');
        if (empty($ns) === false) {
            return mb_strtolower($ns);
        }

        return $ns;
    }

    /**
     * Function to get decimal number
     *
     * @return int
     */
    public function getDecimalNumber(): int
    {

        if (array_key_exists('ss_decimal_number', $this->Data) === true && $this->Data['ss_decimal_number'] !== null) {
            return (int)$this->Data['ss_decimal_number'];
        }
        return 0;
    }

    /**
     * Function to get decimal separator
     *
     * @return string
     */
    public function getDecimalSeparator(): string
    {
        return $this->getStringValue('ss_decimal_separator');
    }

    /**
     * Function to get thousand separator
     *
     * @return string
     */
    public function getThousandSeparator(): string
    {
        return $this->getStringValue('ss_thousand_separator');
    }

    /**
     * Function to get logo
     *
     * @return string
     */
    public function getLogo(): string
    {
        return $this->getStringValue('ss_logo');
    }

    /**
     * Function to check is setting System
     *
     * @return bool
     */
    public function isSystem(): bool
    {
        $val = $this->getStringValue('ss_system');
        return ($val === 'Y');
    }

    /**
     * Function to get user id
     *
     * @param string $keyWord To store the keyword.
     *
     * @return string
     */
    private function getStringValue(string $keyWord): string
    {
        if (array_key_exists($keyWord, $this->Data) === true && $this->Data[$keyWord] !== null) {
            return $this->Data[$keyWord];
        }
        return '';
    }

    /**
     * Function to get user id
     *
     * @param string $keyWord To store the keyword.
     *
     * @return int
     */
    private function getIntValue(string $keyWord): int
    {
        if (array_key_exists($keyWord, $this->Data) === true && $this->Data[$keyWord] !== null && is_numeric($this->Data[$keyWord]) === true) {
            return (int)$this->Data[$keyWord];
        }
        return 0;
    }
}
