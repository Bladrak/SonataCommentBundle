<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CommentBundle\Tests\Document;

use Sonata\CommentBundle\Document\BaseThread;
use Sonata\CommentBundle\Document\BaseComment;

/**
 * This is the document BaseComment test class
 *
 * @author Vincent Composieux <vincent.composieux@gmail.com>
 */
class BaseCommentTest extends \PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        // Given
        $thread = new BaseThread();
        $thread->setId('my-comment-thread');

        $comment = new BaseComment();
        $comment->setBody('Comment text');
        $comment->setWebsite('http://www.example.com');
        $comment->setEmail('test@example.com');
        $comment->setNote(0.20);

        $date = new \DateTime();
        $comment->setCreatedAt($date);

        $comment->setState(1);
        $comment->setThread($thread);

        // Then
        $this->assertEquals('Anonymous', $comment->getAuthorName(), 'Should return Anonymous as author name');
        $this->assertEquals('Comment text', $comment->getBody(), 'Should return correct comment body');
        $this->assertEquals('http://www.example.com', $comment->getWebsite(), 'Should return correct comment author website');
        $this->assertEquals('test@example.com', $comment->getEmail(), 'Should return correct comment author email address');
        $this->assertEquals(0.20, $comment->getNote(), 'Should return correct comment note');
        $this->assertEquals($date, $comment->getCreatedAt(), 'Should return correct creation date');

        $this->assertEquals($thread, $comment->getThread(), 'Should return correct thread');
        $this->assertEquals('my-comment-thread', $comment->getThread()->getId(), 'Should return correct thread identifier');
    }
}