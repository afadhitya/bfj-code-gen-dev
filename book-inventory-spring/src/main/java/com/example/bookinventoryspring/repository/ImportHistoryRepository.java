package com.example.bookinventoryspring.repository;

import com.example.bookinventoryspring.model.ImportHistory;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface ImportHistoryRepository extends JpaRepository<ImportHistory, Long> {
}
