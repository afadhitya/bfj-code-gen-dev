package com.example.bookinventoryspring.dto;

import java.util.List;

public class CodeGenerationResult {
    private final List<GeneratedCode> codes;
    private final List<String> errors;

    public CodeGenerationResult(List<GeneratedCode> codes, List<String> errors) {
        this.codes = codes;
        this.errors = errors;
    }

    public List<GeneratedCode> getCodes() {
        return codes;
    }

    public List<String> getErrors() {
        return errors;
    }
}
