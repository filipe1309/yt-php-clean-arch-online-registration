USE development;
INSERT INTO registration (
        name,
        email,
        registration_number,
        birth_date,
        created_at
    )
VALUES (
        'John Doe',
        'john.doe@test.com',
        '37010037000',
        '2000-01-01',
        now()
    );
