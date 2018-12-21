<?php


class Swift_Mime_SimpleMessageTest extends Swift_Mime_MimePartTest
{
    public function testNestingLevelIsSubpart()
    {
        // not relevant
        $this->addToAssertionCount(1);
    }

    public function testNestingLevelIsTop()
    {
        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(
            Swift_Mime_SimpleMimeEntity::LEVEL_TOP, $message->getNestingLevel()
            );
    }

    public function testDateIsReturnedFromHeader()
    {
        $dateTime = new DateTimeImmutable();

        $date = $this->createHeader('Date', $dateTime);
        $message = $this->createMessage(
            $this->createHeaderSet(['Date' => $date]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals($dateTime, $message->getDate());
    }

    public function testDateIsSetInHeader()
    {
        $dateTime = new DateTimeImmutable();

        $date = $this->createHeader('Date', new DateTimeImmutable(), [], false);
        $date->shouldReceive('setFieldBodyModel')
             ->once()
             ->with($dateTime);
        $date->shouldReceive('setFieldBodyModel')
             ->zeroOrMoreTimes();

        $message = $this->createMessage(
            $this->createHeaderSet(['Date' => $date]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setDate($dateTime);
    }

    public function testDateHeaderIsCreatedIfNonePresent()
    {
        $dateTime = new DateTimeImmutable();

        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addDateHeader')
                ->once()
                ->with('Date', $dateTime);
        $headers->shouldReceive('addDateHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setDate($dateTime);
    }

    public function testDateHeaderIsAddedDuringConstruction()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addDateHeader')
                ->once()
                ->with('Date', Mockery::type('DateTimeImmutable'));

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
    }

    public function testIdIsReturnedFromHeader()
    {
        /* -- RFC 2045, 7.
        In constructing a high-level user agent, it may be desirable to allow
        one body to make reference to another.  Accordingly, bodies may be
        labelled using the "Content-ID" header field, which is syntactically
        identical to the "Message-ID" header field
        */

        $messageId = $this->createHeader('Message-ID', 'a@b');
        $message = $this->createMessage(
            $this->createHeaderSet(['Message-ID' => $messageId]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals('a@b', $message->getId());
    }

    public function testIdIsSetInHeader()
    {
        $messageId = $this->createHeader('Message-ID', 'a@b', [], false);
        $messageId->shouldReceive('setFieldBodyModel')
                  ->once()
                  ->with('x@y');
        $messageId->shouldReceive('setFieldBodyModel')
                  ->zeroOrMoreTimes();

        $message = $this->createMessage(
            $this->createHeaderSet(['Message-ID' => $messageId]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setId('x@y');
    }

    public function testIdIsAutoGenerated()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addIdHeader')
                ->once()
                ->with('Message-ID', '/^.*?@.*?$/D');

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
    }

    public function testSubjectIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.5.
     */

        $subject = $this->createHeader('Subject', 'example subject');
        $message = $this->createMessage(
            $this->createHeaderSet(['Subject' => $subject]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals('example subject', $message->getSubject());
    }

    public function testSubjectIsSetInHeader()
    {
        $subject = $this->createHeader('Subject', '', [], false);
        $subject->shouldReceive('setFieldBodyModel')
                ->once()
                ->with('foo');

        $message = $this->createMessage(
            $this->createHeaderSet(['Subject' => $subject]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setSubject('foo');
    }

    public function testSubjectHeaderIsCreatedIfNotPresent()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addTextHeader')
                ->once()
                ->with('Subject', 'example subject');
        $headers->shouldReceive('addTextHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setSubject('example subject');
    }

    public function testReturnPathIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.7.
     */

        $path = $this->createHeader('Return-Path', 'bounces@domain');
        $message = $this->createMessage(
            $this->createHeaderSet(['Return-Path' => $path]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals('bounces@domain', $message->getReturnPath());
    }

    public function testReturnPathIsSetInHeader()
    {
        $path = $this->createHeader('Return-Path', '', [], false);
        $path->shouldReceive('setFieldBodyModel')
             ->once()
             ->with('bounces@domain');

        $message = $this->createMessage(
            $this->createHeaderSet(['Return-Path' => $path]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setReturnPath('bounces@domain');
    }

    public function testReturnPathHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addPathHeader')
                ->once()
                ->with('Return-Path', 'bounces@domain');

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setReturnPath('bounces@domain');
    }

    public function testSenderIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.2.
     */

        $sender = $this->createHeader('index', ['sender@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['index' => $sender]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['sender@domain' => 'Name'], $message->getSender());
    }

    public function testSenderIsSetInHeader()
    {
        $sender = $this->createHeader('index', ['sender@domain' => 'Name'],
            [], false
            );
        $sender->shouldReceive('setFieldBodyModel')
               ->once()
               ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['index' => $sender]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setSender(['other@domain' => 'Other']);
    }

    public function testSenderHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('index', (array) 'sender@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setSender('sender@domain');
    }

    public function testNameCanBeUsedInSenderHeader()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('index', ['sender@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setSender('sender@domain', 'Name');
    }

    public function testFromIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.2.
     */

        $from = $this->createHeader('From', ['from@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['From' => $from]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['from@domain' => 'Name'], $message->getFrom());
    }

    public function testFromIsSetInHeader()
    {
        $from = $this->createHeader('From', ['from@domain' => 'Name'],
            [], false
            );
        $from->shouldReceive('setFieldBodyModel')
             ->once()
             ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['From' => $from]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setFrom(['other@domain' => 'Other']);
    }

    public function testFromIsAddedToHeadersDuringAddFrom()
    {
        $from = $this->createHeader('From', ['from@domain' => 'Name'],
            [], false
            );
        $from->shouldReceive('setFieldBodyModel')
             ->once()
             ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['From' => $from]),
            $this->createEncoder(), $this->createCache()
            );
        $message->addFrom('other@domain', 'Other');
    }

    public function testFromHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('From', (array) 'from@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setFrom('from@domain');
    }

    public function testPersonalNameCanBeUsedInFromAddress()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('From', ['from@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setFrom('from@domain', 'Name');
    }

    public function testReplyToIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.2.
     */

        $reply = $this->createHeader('Reply-To', ['reply@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['Reply-To' => $reply]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['reply@domain' => 'Name'], $message->getReplyTo());
    }

    public function testReplyToIsSetInHeader()
    {
        $reply = $this->createHeader('Reply-To', ['reply@domain' => 'Name'],
            [], false
            );
        $reply->shouldReceive('setFieldBodyModel')
              ->once()
              ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Reply-To' => $reply]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setReplyTo(['other@domain' => 'Other']);
    }

    public function testReplyToIsAddedToHeadersDuringAddReplyTo()
    {
        $replyTo = $this->createHeader('Reply-To', ['from@domain' => 'Name'],
            [], false
            );
        $replyTo->shouldReceive('setFieldBodyModel')
                ->once()
                ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Reply-To' => $replyTo]),
            $this->createEncoder(), $this->createCache()
            );
        $message->addReplyTo('other@domain', 'Other');
    }

    public function testReplyToHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Reply-To', (array) 'reply@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setReplyTo('reply@domain');
    }

    public function testNameCanBeUsedInReplyTo()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Reply-To', ['reply@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setReplyTo('reply@domain', 'Name');
    }

    public function testToIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.3.
     */

        $to = $this->createHeader('To', ['to@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['To' => $to]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['to@domain' => 'Name'], $message->getTo());
    }

    public function testToIsSetInHeader()
    {
        $to = $this->createHeader('To', ['to@domain' => 'Name'],
            [], false
            );
        $to->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['To' => $to]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setTo(['other@domain' => 'Other']);
    }

    public function testToIsAddedToHeadersDuringAddTo()
    {
        $to = $this->createHeader('To', ['from@domain' => 'Name'],
            [], false
            );
        $to->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['To' => $to]),
            $this->createEncoder(), $this->createCache()
            );
        $message->addTo('other@domain', 'Other');
    }

    public function testToHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('To', (array) 'to@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setTo('to@domain');
    }

    public function testNameCanBeUsedInToHeader()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('To', ['to@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setTo('to@domain', 'Name');
    }

    public function testCcIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.3.
     */

        $cc = $this->createHeader('Cc', ['cc@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['Cc' => $cc]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['cc@domain' => 'Name'], $message->getCc());
    }

    public function testCcIsSetInHeader()
    {
        $cc = $this->createHeader('Cc', ['cc@domain' => 'Name'],
            [], false
            );
        $cc->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Cc' => $cc]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setCc(['other@domain' => 'Other']);
    }

    public function testCcIsAddedToHeadersDuringAddCc()
    {
        $cc = $this->createHeader('Cc', ['from@domain' => 'Name'],
            [], false
            );
        $cc->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Cc' => $cc]),
            $this->createEncoder(), $this->createCache()
            );
        $message->addCc('other@domain', 'Other');
    }

    public function testCcHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Cc', (array) 'cc@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setCc('cc@domain');
    }

    public function testNameCanBeUsedInCcHeader()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Cc', ['cc@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setCc('cc@domain', 'Name');
    }

    public function testBccIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.3.
     */

        $bcc = $this->createHeader('Bcc', ['bcc@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['Bcc' => $bcc]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['bcc@domain' => 'Name'], $message->getBcc());
    }

    public function testBccIsSetInHeader()
    {
        $bcc = $this->createHeader('Bcc', ['bcc@domain' => 'Name'],
            [], false
            );
        $bcc->shouldReceive('setFieldBodyModel')
            ->once()
            ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Bcc' => $bcc]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setBcc(['other@domain' => 'Other']);
    }

    public function testBccIsAddedToHeadersDuringAddBcc()
    {
        $bcc = $this->createHeader('Bcc', ['from@domain' => 'Name'],
            [], false
            );
        $bcc->shouldReceive('setFieldBodyModel')
            ->once()
            ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Bcc' => $bcc]),
            $this->createEncoder(), $this->createCache()
            );
        $message->addBcc('other@domain', 'Other');
    }

    public function testBccHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Bcc', (array) 'bcc@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setBcc('bcc@domain');
    }

    public function testNameCanBeUsedInBcc()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Bcc', ['bcc@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setBcc('bcc@domain', 'Name');
    }

    public function testPriorityIsReadFromHeader()
    {
        $prio = $this->createHeader('X-Priority', '2 (High)');
        $message = $this->createMessage(
            $this->createHeaderSet(['X-Priority' => $prio]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(2, $message->getPriority());
    }

    public function testPriorityIsSetInHeader()
    {
        $prio = $this->createHeader('X-Priority', '2 (High)', [], false);
        $prio->shouldReceive('setFieldBodyModel')
             ->once()
             ->with('5 (Lowest)');

        $message = $this->createMessage(
            $this->createHeaderSet(['X-Priority' => $prio]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setPriority($message::PRIORITY_LOWEST);
    }

    public function testPriorityHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addTextHeader')
                ->once()
                ->with('X-Priority', '4 (Low)');
        $headers->shouldReceive('addTextHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setPriority($message::PRIORITY_LOW);
    }

    public function testReadReceiptAddressReadFromHeader()
    {
        $rcpt = $this->createHeader('Disposition-Notification-To',
            ['chris@swiftmailer.org' => 'Chris']
            );
        $message = $this->createMessage(
            $this->createHeaderSet(['Disposition-Notification-To' => $rcpt]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['chris@swiftmailer.org' => 'Chris'],
            $message->getReadReceiptTo()
            );
    }

    public function testReadReceiptIsSetInHeader()
    {
        $rcpt = $this->createHeader('Disposition-Notification-To', [], [], false);
        $rcpt->shouldReceive('setFieldBodyModel')
             ->once()
             ->with('mark@swiftmailer.org');

        $message = $this->createMessage(
            $this->createHeaderSet(['Disposition-Notification-To' => $rcpt]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setReadReceiptTo('mark@swiftmailer.org');
    }

    public function testReadReceiptHeaderIsAddedIfNoneSet()
    {
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Disposition-Notification-To', 'mark@swiftmailer.org');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setReadReceiptTo('mark@swiftmailer.org');
    }

    public function testChildrenCanBeAttached()
    {
        $child1 = $this->createChild();
        $child2 = $this->createChild();

        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );

        $message->attach($child1);
        $message->attach($child2);

        $this->assertEquals([$child1, $child2], $message->getChildren());
    }

    public function testChildrenCanBeDetached()
    {
        $child1 = $this->createChild();
        $child2 = $this->createChild();

        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );

        $message->attach($child1);
        $message->attach($child2);

        $message->detach($child1);

        $this->assertEquals([$child2], $message->getChildren());
    }

    public function testEmbedAttachesChild()
    {
        $child = $this->createChild();

        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );

        $message->embed($child);

        $this->assertEquals([$child], $message->getChildren());
    }

    public function testEmbedReturnsValidCid()
    {
        $child = $this->createChild(Swift_Mime_SimpleMimeEntity::LEVEL_RELATED, '',
            false
            );
        $child->shouldReceive('getId')
              ->zeroOrMoreTimes()
              ->andReturn('foo@bar');

        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );

        $this->assertEquals('cid:foo@bar', $message->embed($child));
    }

    public function testFluidInterface()
    {
        $child = $this->createChild();
        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertSame($message,
            $message
            ->setContentType('text/plain')
            ->setEncoder($this->createEncoder())
            ->setId('foo@bar')
            ->setDescription('my description')
            ->setMaxLineLength(998)
            ->setBody('xx')
            ->setBoundary('xyz')
            ->setChildren([])
            ->setCharset('iso-8859-1')
            ->setFormat('flowed')
            ->setDelSp(false)
            ->setSubject('subj')
            ->setDate(new DateTimeImmutable())
            ->setReturnPath('foo@bar')
            ->setSender('foo@bar')
            ->setFrom(['x@y' => 'XY'])
            ->setReplyTo(['ab@cd' => 'ABCD'])
            ->setTo(['chris@site.tld', 'mark@site.tld'])
            ->setCc('john@somewhere.tld')
            ->setBcc(['one@site', 'two@site' => 'Two'])
            ->setPriority($message::PRIORITY_LOW)
            ->setReadReceiptTo('a@b')
            ->attach($child)
            ->detach($child)
            );
    }

    //abstract
    protected function createEntity($headers, $encoder, $cache)
    {
        return $this->createMessage($headers, $encoder, $cache);
    }

    protected function createMimePart($headers, $encoder, $cache)
    {
        return $this->createMessage($headers, $encoder, $cache);
    }

    private function createMessage($headers, $encoder, $cache)
    {
        $idGenerator = new Swift_Mime_IdGenerator('example.com');

        return new Swift_Mime_SimpleMessage($headers, $encoder, $cache, $idGenerator);
    }
}
