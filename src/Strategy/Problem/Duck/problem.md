# Duck Class Design Problems

## Overview
This document outlines the design issues present in the current Duck class hierarchy that lacks the Strategy design pattern implementation.

## Current Implementation

The current design uses an abstract `Duck` class with concrete implementations:
- `SimpleDuck`
- `SnowDuck`
- `BlackBelliedDuck`

Each duck must implement `quack()` and `display()` methods through inheritance.

## Critical Problems

### 1. **Code Duplication**
**Problem:** Multiple duck types share the same behavior but must duplicate the implementation.

**Example:**
```php
// SimpleDuck
public function quack(): string {
    return 'simple quack';
}

// SnowDuck - DUPLICATED CODE
public function quack(): string {
    return 'simple quack';  // Same as SimpleDuck!
}
```

**Impact:** If the "simple quack" behavior needs to change, you must modify it in multiple places, violating the DRY (Don't Repeat Yourself) principle.

---

### 2. **Forced Implementation of Unwanted Behaviors**
**Problem:** Subclasses must implement all abstract methods even when the behavior doesn't make sense for that type.

**Example:**
```php
// SimpleDuck doesn't need display, but must implement it
public function display(): string {
    return 'null';  // Meaningless implementation
}
```

**Impact:** Creates "null objects" or meaningless implementations that pollute the codebase and can cause runtime issues.

---

### 3. **Inflexible Behavior Changes**
**Problem:** Behaviors are hardcoded into each class, making runtime changes impossible.

**Example:** If you want a duck to change its quack sound at runtime (e.g., when injured or during mating season), you cannot do this without modifying the class or creating new subclasses.

**Current limitation:**
```php
$duck = new SimpleDuck();
// Cannot change quack behavior at runtime
// Stuck with "simple quack" forever
```

---

### 4. **Violation of Open/Closed Principle**
**Problem:** Adding new behaviors requires modifying existing classes or creating numerous subclasses.

**Scenario:** If you need to add:
- A new quack type (e.g., "silent quack", "loud quack")
- A new display type (e.g., "animated display", "3D display")

You must either:
- Modify the abstract class (affecting all subclasses)
- Create combinatorial explosion of subclasses (e.g., `SimpleDuckWithLoudQuack`, `SimpleDuckWithSilentQuack`, etc.)

---

### 5. **Poor Behavior Reusability**
**Problem:** Behaviors are trapped inside class hierarchies and cannot be reused across different object types.

**Example:** If you later create a `Goose` class that needs the same "simple quack" behavior, you must duplicate the code again because behaviors are not encapsulated as separate, reusable units.

---

### 6. **Difficult Testing**
**Problem:** Cannot test behaviors independently from the duck classes.

**Impact:**
- Cannot unit test quack behavior without instantiating a full Duck object
- Cannot mock or stub behaviors easily
- Tight coupling makes test setup complex

---

### 7. **Maintenance Nightmare**
**Problem:** As the number of duck types and behaviors grows, the codebase becomes increasingly difficult to maintain.

**Growth scenario:**
- 10 duck types × 3 quack types × 3 display types = 90 potential class combinations
- Each change to a behavior requires finding and updating multiple classes
- High risk of introducing bugs during maintenance

---
