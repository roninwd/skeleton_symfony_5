<?php

namespace WebOffice\App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use WebOffice\App\Service\Response\Contracts\SuccessResponseFormatterInterface;

class HomeController
{
    /** @required */
    public SuccessResponseFormatterInterface $responseFormatter;

    /**
     * @Route(path="/", name="home")
     */
    public function __invoke()
    {
        return $this->responseFormatter->item();
    }
}