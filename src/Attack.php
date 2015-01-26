<?php

namespace MatthieuTK\PokemonBattle;
use MatthieuTK\PokemonBattle\Model\AttackInterface;

/**
 * Class Attack
 * @package MatthieuTK\PokemonBattle
 *
 * @Entity
 * @Table(name="attack")
 */
class Attack implements AttackInterface {

    /**
    * @var int
    *
    * @Id
    * @GeneratedValue(strategy="AUTO")
    * @Column(name="id", type="integer")
    */
    private $id;

    /**
     * @var string
     *
     * @Column(name="trainer_striker_username", type="string", length=50)
     */
    private $trainerStrikerUsername;

    /**
     * @var string
     *
     * @Column(name="trainer_defensor_username", type="string", length=50)
     */
    private $trainerDefensorUsername;

    /**
     * @var string
     *
     * @Column(name="pokemon_striker_name", type="string", length=50)
     */
    private $pokemonStrikerName;

    /**
     * @var string
     *
     * @Column(name="pokemon_defensor_name", type="string", length=50)
     */
    private $pokemonDefensorName;

    /**
     * @var int
     *
     * @Column(name="attack_value", type="integer")
     */
    private $attackValue;

    /**
     * @var int
     *
     * @Column(name="timestamp", type="datetime", nullable=false)
     * @Version
     */
    private $timestamp;

    /**
     * @return int
     */
    public function getAttackValue()
    {
        return $this->attackValue;
    }

    /**
     * @param int $attackValue
     * @return \MatthieuTK\PokemonBattle\Model\PokemonInterface|void
     */
    public function setAttackValue($attackValue)
    {
        $this->attackValue = $attackValue;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getPokemonDefensorName()
    {
        return $this->pokemonDefensorName;
    }

    /**
     * @param string $pokemonDefensorName
     * @return \MatthieuTK\PokemonBattle\Model\AttackInterface|void
     */
    public function setPokemonDefensorName($pokemonDefensorName)
    {
        $this->pokemonDefensorName = $pokemonDefensorName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPokemonStrikerName()
    {
        return $this->pokemonStrikerName;
    }

    /**
     * @param string $pokemonStrikerName
     * @return \MatthieuTK\PokemonBattle\Model\AttackInterface|void
     */
    public function setPokemonStrikerName($pokemonStrikerName)
    {
        $this->pokemonStrikerName = $pokemonStrikerName;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrainerDefensorUsername()
    {
        return $this->trainerDefensorUsername;
    }

    /**
     * @param string $trainerDefensorUsername
     * @return \MatthieuTK\PokemonBattle\Model\AttackInterface|void
     */
    public function setTrainerDefensorUsername($trainerDefensorUsername)
    {
        $this->trainerDefensorUsername = $trainerDefensorUsername;
        return $this;
    }




    /**
     * @return string
     */
    public function getTrainerStrikerUsername()
    {
        return $this->trainerStrikerUsername;
    }

    /**
     * @param string $trainerStrikerUsername
     * @return \MatthieuTK\PokemonBattle\Model\AttackInterface|void
     */
    public function setTrainerStrikerUsername($trainerStrikerUsername)
    {
        $this->trainerStrikerUsername = $trainerStrikerUsername;
        return $this;
    }
}