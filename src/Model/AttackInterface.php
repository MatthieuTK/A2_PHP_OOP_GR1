<?php

namespace MatthieuTK\PokemonBattle\Model;

interface AttackInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getTrainerStrikerUsername();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setTrainerStrikerUsername($name);

    /**
     * @return string
     */
    public function getTrainerDefensorUsername();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setTrainerDefensorUsername($name);

    /**
     * @return string
     */
    public function getPokemonStrikerName();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setPokemonStrikerName($name);

    /**
     * @return string
     */
    public function getPokemonDefensorName();

    /**
     * @param string $name
     *
     * @return AttackInterface
     */
    public function setPokemonDefensorName($name);

    /**
     * @return int
     */
    public function getAttackValue();

    /**
     * @param int $attack
     *
     * @return PokemonInterface
     */
    public function setAttackValue($attack);

    /**
     * @internal param int $time
     *
     * @return int
     */

    public function getTimestamp();
}