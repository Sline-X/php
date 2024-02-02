<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter9\Prototype;

class TerrainFactory
{
    /**
     * @param \Main\Zandstra\Chapter9\Prototype\Sea    $sea
     * @param \Main\Zandstra\Chapter9\Prototype\Plains $plains
     * @param \Main\Zandstra\Chapter9\Prototype\Forest $forest
     */
    #[InjecConstructor(Sea::class, Plains::class, Forest::class)]
    public function __construct(
        private Sea $sea,
        private Plains $plains,
        private Forest $forest
    ) {
    }
    
    /**
     * @return \Main\Zandstra\Chapter9\Prototype\Sea
     */
    public function getSea(): Sea
    {
        return $this->sea;
    }
    
    /**
     * @return \Main\Zandstra\Chapter9\Prototype\Plains
     */
    public function getPlains(): Plains
    {
        return $this->plains;
    }
    
    /**
     * @return \Main\Zandstra\Chapter9\Prototype\Forest
     */
    public function getForest(): Forest
    {
        return $this->forest;
    }
    
}
