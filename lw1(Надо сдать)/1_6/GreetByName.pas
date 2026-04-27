PROGRAM GreetByName(INPUT, OUTPUT);
USES
  DOS;

VAR
  QueryString, Name: STRING;
  NamePos: INTEGER;

BEGIN {GreetByName}
  WRITELN('Content-Type: text/html');
  WRITELN;

  QueryString := GetEnv('QUERY_STRING');

  NamePos := Pos('name=', QueryString);

  IF NamePos > 0 
  THEN
    BEGIN
      Name := Copy(QueryString, NamePos + 5, Length(QueryString) - NamePos - 4);
      IF Name = '' 
      THEN
        Name := 'Anonymous'
    END
  ELSE
    Name := 'Anonymous';
  
  WRITELN('<h1>Hello dear, ', Name, '!</h1>')
END. {GreetByName}