<?php

declare(strict_types=1);

namespace App\Tests\Unit\Doctine\ORM\Extension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Doctrine\ORM\Extension\ClassroomExtension;
use App\Entity\Classroom;
use Doctrine\ORM\QueryBuilder;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ClassroomExtensionTest extends MockeryTestCase
{
    public function testApplyToCollection()
    {
        $authorizationChecker = \Mockery::mock(AuthorizationCheckerInterface::class);
        $authorizationChecker->shouldReceive('isGranted')->andReturnFalse();

        $qn = \Mockery::mock(QueryNameGeneratorInterface::class);
        $qb = \Mockery::mock(QueryBuilder::class);
        $qb->shouldReceive('getRootAliases')->andReturn(['o']);
        $qb->shouldReceive('andWhere')->withAnyArgs()->andReturn($qb);
        $qb->shouldReceive('setParameter')->withAnyArgs()->andReturn($qb);

        $extension = new ClassroomExtension($authorizationChecker);
        $extension->applyToCollection($qb, $qn, Classroom::class, 'get');

        $qb->shouldHaveReceived('andWhere');
    }
}
