# Channel/Visitor System Design Problems

## Overview
This document outlines the design issues present in the current Channel and Visitor implementation that relies on a polling mechanism instead of the Observer design pattern.

## Current Implementation

The current design uses a polling-based approach where:
- `Channel` (Abstract Class): Holds state (`newVideoUpload`) but doesn't notify anyone.
- `Visitor` (Interface): Has to actively ask `askForNewVideo(Channel)`.
- `FirstVisitor`: Concrete implementation that must repeatedly check for updates.

## Critical Problems

### 1. **Inefficient Polling (Busy Waiting)**
**Problem:** Visitors must constantly ask the Channel if there is a new video.

**Example:**
```php
// Visitor implementation (conceptual)
while (true) {
    if ($channel->askForNewVideo($this)) {
        // Watch video
    }
    // Sleep or wait...
}
```

**Impact:** Wastes CPU cycles and system resources checking for updates when nothing has changed.

---

### 2. **Information Lag (Latency)**
**Problem:** There is a delay between when an event occurs and when the generic Visitor notices it.

**Example:** If a video is uploaded at T=0, but the Visitor polls at T=5, there is a 5-second delay before the user is notified.

**Impact:** Poor user experience for real-time notifications.

---

### 3. **Violation of Open/Closed Principle**
**Problem:** The Channel has no way to broadcast to new types of subscribers without them actively polling.

**Scenario:** If you want to add a `MobileAppNotification` or `EmailSubscriber`, they all have to implement their own polling logic. The Channel is passive and cannot trigger these external systems efficiently.

---

### 4. **Tight Coupling in Behavior**
**Problem:** The Visitor knows too much about the internal state mechanism of the Channel (it knows it has to "ask").

**Impact:** If the Channel changes how it stores video status, the Visitors might need to change how they ask.

---

### 5. **Poor Scalability**
**Problem:** As the number of visitors grows, the number of poll requests to the Channel increases linearly or potentially exponentially if not managed.

**Impact:** A popular channel with millions of subscribers cannot handle millions of "did you upload?" requests every second.
