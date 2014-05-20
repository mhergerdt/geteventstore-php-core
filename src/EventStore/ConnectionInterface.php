<?php

namespace EventStore;

/**
 * Interface ConnectionInterface
 * @package EventStore
 */
interface ConnectionInterface
{
    /**
     * Client expects that stream does not exist and will be created
     */
    const STREAM_VERSION_NOT_EXISTING = -1;

    /**
     * Disables optimistic locking
     */
    const STREAM_VERSION_ANY = -2;

    /**
     * @param string $stream
     * @param int    $expectedVersion
     * @param array  $events
     * @return void
     */
    public function appendToStream($stream, $expectedVersion, array $events);

    /**
     * @param  string            $stream
     * @param  int               $start
     * @param  int               $count
     * @param  bool              $resolveLinkTos
     * @return StreamEventsSlice
     */
    public function readStreamEventsForward($stream, $start, $count, $resolveLinkTos);

    /**
     * @param  string            $stream
     * @param  int               $start
     * @param  int               $count
     * @param  bool              $resolveLinkTos
     * @return StreamEventsSlice
     */
    public function readStreamEventsBackward($stream, $start, $count, $resolveLinkTos);

    /**
     * Deletes a stream
     *
     * @param  string $stream
     * @param  bool   $hardDelete
     * @return bool
     */
    public function deleteStream($stream, $hardDelete = false);
}
