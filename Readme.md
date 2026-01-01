# Design Patterns with PHP

## 📋 Requirements

Before using this project, ensure you have the following installed:
- PHP 8.4 or higher
- Composer

## 🔧 Installation

**First, install the project dependencies:**
```bash
composer install
```

## 📚 Documentation

This repository contains complete examples of **Design Patterns** implementations, demonstrating how to solve common object-oriented design problems.

### 📖 Reading Guide

Each design pattern directory contains documentation to help you understand the problems and solutions:

1. **problem.md** - Learn about the design issues and code smells in the original implementation without the design pattern
2. **solution.md** - Discover how the design pattern solves these problems and the benefits it provides

## 🗂️ Available Patterns

### Behavioral Patterns
- **Strategy Pattern** 
- **Observer Pattern**

### Creational Patterns
- Coming soon...

### Structural Patterns
- Coming soon...

## 🎯 What You'll Learn

- Common problems in object-oriented design
- How design patterns eliminate code duplication
- Implementing SOLID principles
- Creating flexible, maintainable, and testable code
- Real-world examples with practical use cases

## 🚀 How to Use This Repository

1. **Install dependencies** (see Installation section above)
2. Navigate to the design pattern you want to learn
3. Read the `problem.md` file to understand the problems
4. Read the `solution.md` file to see how the pattern solves them
5. Compare the code in `WithoutDesignPattern` and `WithDesignPattern` directories
6. Run the tests to see the patterns in action

## 📝 Pattern Structure

Each pattern follows this structure:
```
PatternName/
├── WithoutDesignPattern/     # Original problematic implementation
│   └── [code files]
│
├── WithDesignPattern/        # Refactored implementation using the pattern
│   └── [code files]
│
├── problem.md                # Documentation of design problems
└── solution.md               # Documentation of the solution
```

## 🧪 Running Tests
```bash
# Run all tests
vendor/bin/phpunit

# Run tests for a specific pattern
vendor/bin/phpunit tests/TestDuckWithStrategyPattern.php
```

---

**Note:** This is an educational repository demonstrating design patterns and SOLID principles in action with PHP.