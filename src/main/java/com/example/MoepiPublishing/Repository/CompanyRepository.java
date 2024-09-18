package com.example.MoepiPublishing.Repository;

import com.example.MoepiPublishing.Entity.Company;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface CompanyRepository extends JpaRepository<Company, Long> {
    // No need to define findAll() as JpaRepository provides it
    Company findByCompanyName(String companyName);
}
