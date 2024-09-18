package com.example.MoepiPublishing.Service;


import com.example.MoepiPublishing.Entity.Company;
import com.example.MoepiPublishing.Repository.CompanyRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class CompanyService {

    @Autowired
    private CompanyRepository companyRepository;

    public List<Company> getAllCompanies() {
        return companyRepository.findAll();
    }

    public Company addCompany(Company company) {
        return companyRepository.save(company);
    }

    public void deleteCompany(Long companyId) {
        companyRepository.deleteById(companyId);
    }
    public Company getCompanyByName(String name) {
        return companyRepository.findByCompanyName(name);
    }
}
