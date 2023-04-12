import { Card, CardBody, Heading } from '@chakra-ui/react';

type props = {
  index: string;
  heading: string;
  text: string;
};

export const PostBox = (props: props) => {
  return (
    <Card mt="2" key={props.index} _hover={{ bgColor: 'gray.300' }} cursor="pointer">
      <CardBody>
        <Heading size="md">{props.heading}</Heading>
        <Text pt="2" fontSize="sm">
          {props.text}
        </Text>
      </CardBody>
    </Card>
  );
};
